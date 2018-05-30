<?php
namespace Chr1Sp1n\Console;

class Console{

	/**
	 * Undocumented function
	 *
	 * @param string $prompt
	 * @param boolean $default
	 * @param array $yes = ['yes','y','si']
	 * @param array $no = ['no','n']
	 * @return int 
	 */
	public static function yesNo(string $prompt, bool $default=false, array $yes = ['yes','y','si'], array $no = ['no','n']){
		while(true){
			$resp = readline($prompt." (yes, no)? [".(($default)?'yes':'no')."] ");	
			if($resp==NULL || $resp==''){			
				return $default;
			}else{
				if(in_array($resp,$yes)) return true;
				if(in_array($resp,$no)) return false;					
			}
		}		
	}

	/**
	 * Undocumented function
	 *
	 * @param string $text
	 * @param boolean $nl = true
	 * @return void
	 */
	public static function write(string $text, bool $nl=true){
		print_r($text.(($nl)?PHP_EOL:''));
	}

	/**
	 * Undocumented function
	 *
	 * @param string $prompt
	 * @param string $default
	 * @param array $options = []
	 * @return void
	 */
	public static function read(string $prompt, $default=NULL, array $options=[]){
		if(count($options)>0){
			self::write($prompt);
			foreach ($options as $key => $value) {
				($key === $value)? self::write($value.', ',false) : self::write('    '.$key . ') ' . $value);
			}
			while(true){
				$sel = readline("Chose an option from listed above: [".$default."] ");
				if($sel===NULL || $sel === '') return $default;
				if(key_exists($sel,$options)) return $options[$sel];	
			}
		}else{
			while(true){
				$resp = readline($prompt.(($default!==NULL)? ": [".$default."] " : ": "));			
				if($resp === NULL || $resp === ''){
					if($default !== NULL ) return $default;
				}else{
					return $resp;
				}
			}
		}
	}

}

?>