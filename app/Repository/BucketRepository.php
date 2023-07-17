<?php

namespace App\Repository;

use App\Models\BucketModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\BucketRepositoryInterface;
use App\Repository\BucketSuggestRepositoryInterface;


class BucketRepository implements BucketRepositoryInterface
{
    protected $model;

    public function __construct(BucketModel $buckerModel)
    {
        $this->model = $buckerModel;
    }
    
    /**
     * @param array $request
     * @return BucketModel
     */
    public function store(array $request){
        return $this->model->updateOrCreate(
            ['name' => $request['name']],
            ['volume' => $request['volume']]
        );
    }

    /**
     * @param array $request
     * @return string
     */
    public function suggestBuckets(array $request){
        $this->model->query()->update(['ball_count' => 0, 'empty_volume' => DB::raw('volume')]);
        $request = $this->getBallValue($request);

        $buckets = $this->model->orderBy('volume', 'desc')->get();

        foreach($request['balls'] as $ball){
            $maxEmptyVolume = 0;

            foreach($buckets as $bucket){
                $requiredVolume = $ball['value'] * $ball['volume'];
                $availableVolume = $bucket->empty_volume;
                if ($availableVolume >= $requiredVolume) {
                    $bucket->increment('ball_count', $ball['value']);
                    $bucket->decrement('empty_volume', $requiredVolume);
                    $usedBuckets[$bucket->name][$ball['name']] = $ball['value'];
                    
                    $ball['value'] = 0; // All balls placed, no more remaining
                    break(1);
                } elseif ($availableVolume > $maxEmptyVolume && $availableVolume >= $ball['volume']) {
                    $maxEmptyVolume = $availableVolume;

                    $placedCount = floor($availableVolume / $ball['volume']);
                    $bucket->increment('ball_count', $placedCount);
                    $bucket->decrement('empty_volume', $placedCount * $ball['volume']);
                    $usedBuckets[$bucket->name][$ball['name']] = $placedCount;
                    $ball['value'] -= $placedCount; // Reduce the remaining count of balls
                }
            }

    
            // If there are still remaining balls but no bucket can accommodate them, break the loop
            if ($ball['value'] > 0 && $buckets->sum('empty_volume') < ($ball['value'] * $ball['volume'])) {
                return 'Still some balls left to accommodate';
            }
        }
        // dd($usedBuckets);
        app(BucketSuggestRepositoryInterface::class)->store($usedBuckets);

        return $this->prepareResult($usedBuckets);
    }   
     
    /**
     * @param array $request
     * @return string
     */
    private function prepareResult(array $usedBuckets){
        $html = '';
        $html .= '<ul>';
        foreach($usedBuckets as $bucketName => $usedBucket){

            $html .= '<li>';
            $html .= ucfirst($bucketName) . ': ';
            
            $ballIndexCounter = 1;
            foreach($usedBucket as $ballColor => $numberPlacedBallInBucket){
                if($ballIndexCounter == 1){
                    $html .= '<b>Place ' . $numberPlacedBallInBucket . ' '. ucfirst($ballColor). ($numberPlacedBallInBucket > 1 ? ' Balls': ' Ball') ;
                }elseif($ballIndexCounter > 1){
                    $html .= ' And '. $numberPlacedBallInBucket . ' '. ucfirst($ballColor). ($numberPlacedBallInBucket > 1 ? ' Balls ': ' Ball');
                }
                $ballIndexCounter++;
            }
            $html .= '</b>.';
            $html .= '</li>';
            
        }
        $html .= '</ul>';

        return $html;
    }

    private function getBallValue(array $request)
    {
        $balls = app(BallRepositoryInterface::class)->index();

        foreach($request['balls'] as $key => $value){
            $ball = $balls->where('id', $value['id'])->first();
            $request['balls'][$key]['total_volume'] = $ball->volume * $value['value'];
            $request['balls'][$key]['volume'] = $ball->volume;
            $request['balls'][$key]['name'] = $ball->name;
            
        }
        return $request;
    }
}