<?php

namespace HowRareIs\SolanaPhpSdk\Util;

use HowRareIs\SolanaPhpSdk\PublicKey;

interface HasPublicKey
{
    public function getPublicKey(): PublicKey;
}
