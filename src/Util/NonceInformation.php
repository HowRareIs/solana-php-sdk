<?php

namespace HowRareIs\SolanaPhpSdk\Util;

use HowRareIs\SolanaPhpSdk\TransactionInstruction;

class NonceInformation
{
    public string $nonce;
    public TransactionInstruction $nonceInstruction;

    public function __construct(string $nonce, TransactionInstruction $nonceInstruction)
    {
        $this->nonce = $nonce;
        $this->nonceInstruction = $nonceInstruction;
    }
}
