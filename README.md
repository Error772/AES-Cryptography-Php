# AES-Cryptography #
### *The Best Aes Cryptography Class For Php ✔️*

## Supports

- `CBC { Specified IV }`✔️
- `CBC { Random IV }`✔️
- `ECB`✔️


# **Usage** #
---
```php
include "Aes.php";

/** @Dev -> @Ali_Cod7  */

# ECB Mode

$AES = new Aes("123", "12345678901234561234567890123456", 256, 'ECB');

//=================================================================================================\\

# CBC Mode { Specified IV }

$AES = new Aes("123", "12345678901234561234567890123456", 256, 'CBC', "1234567891234567");

//=================================================================================================\\

# CBC Mode { Random IV }

$AES = new Aes("123", "12345678901234561234567890123456", 256, 'CBC', Null);

//=================================================================================================\\

$Encrypted = $AES->Encrypt();
$Decrypted = $AES->Decrypt();

echo 'Encrypted String : ' . $Encrypted . "<br/>";
echo 'Decrypted String : ' . $Decrypted . "<br/>";

```
---

- ### **Telegram ID : [Ali_Cod7](https://T.me/Error772)**
