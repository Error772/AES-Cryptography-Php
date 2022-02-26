<?php /** @noinspection ALL */

class Aes {

    /** @Dev -> @Ali_Cod7  */

    /** @Supports
     *
     * @Param ECB
     *
     * @Param CBC
     *
     */

    /** @Padding Based On @PKCS7 */

    # Note -> If You Want To Use ECB Mode Leave IV Field Null!

    # Values

    protected $Key;
    protected $Data;
    protected $Method;
    protected $IV;

    # Constructor

    function __construct($Data = null, $Key = null, $BlockSize = null, $Mode = 'ECB', $IV = null)
    {
        $this->SetValues($Data, $Key, $IV);
        $this->SetMethod($BlockSize, $Mode);
        if ($Mode == 'CBC') {
            if ($IV == null) {
                $this->IV = $this->RandomIV();
            } else {
                $this->IV = $IV;
            }
        }
    }

    # Set Values Functions

    protected function SetValues($Data, $Key) {
        $this->Data = $Data;
        $this->Key = $Key;
    }

    protected function SetMethod($BlockSize, $Mode)
    {
        if ($BlockSize == 192 && in_array('', array('CBC-HMAC-SHA1', 'CBC-HMAC-SHA256', 'XTS'))) {
            $this->Method = null;
        } else {
            $this->Method = 'AES-' . $BlockSize . '-' . $Mode;
        }
    }

    # Validate Taken Parameters

    protected function Validation()
    {
        if ($this->Data != null AND $this->Method != null AND $this->Key != null) {
            return true;
        } else {
            return false;
        }
    }

    # Generate Random IV If Given IV Was Null { Only For CBC Mode }

    protected function RandomIV()
    {
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->Method));
    }
    
    public function Encrypt()
    {
        if ($this->Validation()) {
            return trim(openssl_encrypt($this->Data, $this->Method, $this->Key, 0, $this->IV));
        } else {
            echo 'Invalid Parameters!';
        }
    }
    
    public function Decrypt()
    {
        if ($this->Validation()) {
            return trim(openssl_decrypt($this->Data, $this->Method, $this->Key, 0, $this->IV));
        } else {
            echo 'Invalid Parameters!';
        }
    }
}
