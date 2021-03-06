<?php
namespace Miniorange\SP\Helper;
use DOMElement;
use DOMNode;
use DOMDocument;
use Exception;

use Miniorange\Helper\lib\XMLSecLibs\XMLSecurityKey;
use Miniorange\Helper\lib\XMLSecLibs\XMLSecEnc;
use Miniorange\Helper\lib\XMLSecLibs\XMLSecurityDSig;
use Miniorange\Helper\lib\XMLSecLibs\Utils\XPath;

class SetRedirect{
public function setRedirect($url, $msg = null, $type = null)
	{
        // $besaml= new BesamlController();
		// $besaml->redirect = $url;

		if ($msg !== null)
		{
			// Controller may have set this directly
			$this->message = $msg;
		}

		// Ensure the type is not overwritten by a previous call to setMessage.
		if (empty($type))
		{
			if (empty($besaml->messageType))
			{
				$this->messageType = 'message';
			}
		}
		// If the type is explicitly set, set it.
		else
		{
			$this->messageType = $type;
		}
		return $besaml;
	}

}