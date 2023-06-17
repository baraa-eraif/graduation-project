<?php

namespace App\Http\Controllers;

use App\Models\StudentBalanceTransaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class StudentWallet extends Controller
{

    public $transactionType;

    public $amount;

    public $sourceModel;

    public $sourceId;

    public $description;

    public $studentModel;

    const REGISTRATION_COURSE_TRANSACTION_TYPE = 'registration_course';


    const CASH_DEPOSIT_TRANSACTION_TYPE = 'cash_deposit';

    const DEPOSIT_TRANSACTIONS = array(self::CASH_DEPOSIT_TRANSACTION_TYPE);

    const CREDIT_TRANSACTIONS = array(self::REGISTRATION_COURSE_TRANSACTION_TYPE);

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $sourceModel
     */
    public function setSourceModel($sourceModel)
    {
        $this->sourceModel = $sourceModel;
        return $this;
    }

    /**
     * @param mixed $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }



    /**
     * @param mixed $studentModel
     */
    public function setStudentModel($studentModel)
    {
        $this->studentModel = $studentModel;
        return $this;
    }

    public function saveTransaction()
    {
        StudentBalanceTransaction::create(array(
            'student_id' => get($this->studentModel,'id'),
            'student_data' => $this->studentModel,
            'amount' => $this->amount,
            'transaction_type' => $this->transactionType,
            'description' => $this->description,
            'sourceable_id' => $this->sourceId,
            'sourceable_model' => $this->sourceModel
        ));
        return $this;
    }


    public function syncBalance()
    {
        $deposit = StudentBalanceTransaction::query()->whereIn('transaction_type', self::DEPOSIT_TRANSACTIONS)->sum('amount');
        $credit = StudentBalanceTransaction::query()->whereIn('transaction_type', self::CREDIT_TRANSACTIONS)->sum('amount');

        $this->studentModel->update(array('balance' => $deposit - $credit));
        return $this;
    }

    public function execute()
    {
//        DB::beginTransaction();
//        try {
            $this->saveTransaction()->syncBalance();
//            DB::commit();
//        } catch (\Exception $exception) {
//dd($exception);
//        }
    }

}
