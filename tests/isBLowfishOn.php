<?PHP

  // Check if the PHP supports BLOWFISH encryption.
  if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
    echo "CRYPT_BLOWFISH is enabled!";
  } else {
    echo "CRYPT_BLOWFISH is NOT enabled!";
  }
?>
