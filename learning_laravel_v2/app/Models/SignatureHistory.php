<?php

namespace App\Models;

use App\Enums\SignatureStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fullable = [
        'signature_id',
        'last_updated_at',
        'old_plan_id',
        'old_status'
    ];

    protected $casts = [
        'last_status' => SignatureStatus::class
    ];

    public function signature() {
        return $this->belongsTo(Signature::class);
    }
}
