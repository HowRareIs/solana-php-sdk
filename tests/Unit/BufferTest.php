<?php

namespace HowRareIs\SolanaPhpSdk\Tests\Unit;

use HowRareIs\SolanaPhpSdk\Account;
use HowRareIs\SolanaPhpSdk\Keypair;
use HowRareIs\SolanaPhpSdk\Programs\SystemProgram;
use HowRareIs\SolanaPhpSdk\PublicKey;
use HowRareIs\SolanaPhpSdk\Tests\TestCase;
use HowRareIs\SolanaPhpSdk\Util\Buffer;

class BufferTest extends TestCase
{
    /** @test */
    public function it_buffer_push_fixed_length()
    {
        $lamports = 4;
        $space = 6;
        $programId = Keypair::generate()->getPublicKey();

        $rawCreateAccountBinary = [
            // uint32
            ...unpack("C*", pack("V", SystemProgram::PROGRAM_INDEX_CREATE_ACCOUNT)),
            // int64
            ...unpack("C*", pack("P", $lamports)),
            // int64
            ...unpack("C*", pack("P", $space)),
            //
            ...$programId->toBytes(),
        ];

        $bufferable = Buffer::from()
            ->push(
                Buffer::from(SystemProgram::PROGRAM_INDEX_CREATE_ACCOUNT,Buffer::TYPE_INT, false)
            )
            ->push(
                Buffer::from($lamports,Buffer::TYPE_LONG, false)
            )
            ->push(
                Buffer::from($space,Buffer::TYPE_LONG, false)
            )
            ->push($programId)
        ;

        $this->assertEquals($rawCreateAccountBinary, $bufferable->toArray());
    }
}
