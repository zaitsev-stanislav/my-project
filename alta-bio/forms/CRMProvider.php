<?

class CRMProvider
{
	/** @var array $config */
	private $config = [];
	/** @var array $postData */
	private $postData = [];

    public function __construct($config = [], $postData = [])
	{
		$this->config = $config;
		$this->postData = $postData;

		if (isset($this->config['CRM_AUTH'])){
			$this->postData['AUTH'] = $this->config['crm_auth'];
		}else{
			$this->postData['LOGIN'] = isset($this->config['crm_username']) ? $this->config['crm_username'] : '';
			$this->postData['PASSWORD'] = isset($this->config['crm_pw']) ? $this->config['crm_pw'] : '';
		}
	}

    public function send($data = [], $body = null)
	{
		// open socket to CRM
		$fp = fsockopen("ssl://".$this->config['crm_host'], $this->config['crm_port'], $errno, $errstr, 30);
		if ($fp)
		{
			// prepare POST data
			$strPostData = '';
            foreach ($data as $key => $value){
                switch ($key){
                    case 'name': $this->postData['NAME'] = $value;
                        break;
                    case 'phone': $this->postData['PHONE_WORK'] = $value;
                        break;
                    case 'Сообщение': $this->postData['COMMENTS'] = $value;
                        break;
                }
            }
            
            if(isset($body) && $body){
                $this->postData['COMMENTS'] = $body;
            }

			foreach ($this->postData as $key => $value){
				$strPostData .= ($strPostData == '' ? '' : '&').trim($key).'='.urlencode(trim($value));
			}

			// prepare POST headers
			$str = "POST ".$this->config['crm_path']." HTTP/1.0\r\n";
			$str .= "Host: ".$this->config['crm_host']."\r\n";
			$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$str .= "Content-Length: ".strlen($strPostData)."\r\n";
			$str .= "Connection: close\r\n\r\n";

			$str .= $strPostData;

			// send POST to CRM
			fwrite($fp, $str);

			// get CRM headers
			$result = '';
			while (!feof($fp))
			{
				$result .= fgets($fp, 128);
			}
			fclose($fp);

			// cut response headers
//			$response = explode("\r\n\r\n", $result);
//			return '<pre>'.print_r($response[1], 1).'</pre>';
			return true;
		}

//		return 'Connection Failed! '.$errstr.' ('.$errno.')';
		return false;
	}
}
