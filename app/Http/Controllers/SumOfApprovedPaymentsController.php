<?php

namespace App\Http\Controllers;

use App\Models\User;

class SumOfApprovedPaymentsController extends Controller
{
    public function __invoke()
    {
        $approvers = User::approvers()->get();

        $approversWithPayments = [];
        foreach ($approvers as $approver) {
            $totalSum = 0;
            foreach ($approver->approvals as $approval) {
                if ($approval->isApproved()) {
                    $totalSum += $approval->payment->total_amount;
                }
            }
            $approversWithPayments[] = [
                'user_id' => $approver->id,
                'total' => $totalSum
            ];
        }

        return response()->json($approversWithPayments, 200);
    }
}
