<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class AssessmentConfirmations extends Model
{
    protected $guarded = [];
    protected $table = 'assessment_confirmations';

    public function manager() {

        return $this->belongsTo(User::class , 'user_id');
     
    }

}
