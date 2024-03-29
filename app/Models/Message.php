<?php

namespace App\Models;

use FCM;
use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use function auth;

class Message extends Model
{
    //
    protected $guarded = ['id'];

    protected $dates = ['student_read_at', 'main_cordinator_read_at'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function application()
    {
        return $this->belongsTo('App\Models\InternshipApplication');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function main_cordinator()
    {
        return $this->belongsTo('App\Models\MainCordinator');
    }

    public function scopeGetStudentMessage($query)
    {
        return $this->where([['user_id', auth()->id(), ['from_main_cordinator', true], ['read_at', null]]])->get();
    }


    public function scopeCountStudentMessage($query)
    {
        return $this->where([['user_id', auth()->id(), ['from_main_cordinator', true], ['read_at', null]]])->count();
    }

    public function scopeStudentsAllMessages($query)
    {
        return $this->where('user_id', auth()->id())->get();/* orderBy('message, desc') */ //* paginate(5); */
    }

    public function scopeToSingleDevice($query, $token=null, $title=null, $body=null, $icon, $click_action)
    {
        if ($title == 'student message') {
            $badge = $this->scopeMainCordinatorNumberAlert();
        } elseif ($title == 'main_cordinator message') {
            $badge = $this->scopeNumberAlert();
        }


        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
                            ->setSound('default')
                            ->setBadge($this->where([['student_read_at', null], ['user_id', auth()->id()]])->count())
                            ->setIcon($icon)
                            ->setClickAction($click_action);

        $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = $token;

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();

        $downstreamResponse->numberModification();

        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();

        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:error) - in production you should remove from your database the tokens
        $downstreamResponse->tokensWithError();
    }

    public function scopeToMultipleDevice($query, $model, $title=null, $body=null, $icon, $click_action)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
                            ->setSound('default')
                            ->setBadge($this->where([['read_at', null], ['user_id', auth()->id()]])->count())
                            ->setIcon($icon)
                            ->setClickAction($click_action);

        $dataBuilder = new PayloadDataBuilder();

        //$dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // You must change it to get your tokens
        $tokens = $model->pluck('device_token')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();

        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();
    }

    public function scopeRead()
    {
        return $this->where([['read_at', null], ['user_id', auth()->id()]])->paginate(5);
    }

    public function scopeNumberAlert()
    {
        return $this->where([['student_read_at', null], ['user_id', auth()->id()]])->count();
    }


    public function scopeMainCordinatorNumberAlert()
    {
        return $this->where([['main_cordinator_read_at', null], ['from_student', true]])->count();
    }
}
