<?php

class Logger
{
	public static $PATH; // Путь до файла
	protected $name_db; 
	protected $name_file;
	protected $name_table;
	protected $res;
	protected $date_time;
	
	
	public function __construct($filename = 'log.txt', $dbname = log_db, $tbname = log_tb)
	{
		$this->name_file = $filename;
		$this->name_db = $dbname;
		$this->name_table = $tbname;
	}

	/////////////////////////////////////////////
	
	public function get_message($tmp) // Функция получения сообщения
	{
		if ($tmp)
		{
			$this->date_time = date('Y-m-d H:i:s'); // Определение даты и времени
			$this->res = $tmp;
			if (is_array($tmp) || is_object($tmp))
			{			
				$this->res = print_r($tmp, true); // Печать перевода $tmp в строку
			}
			return $this->res;
		}
	}
	
	/////////////////////////////////////////////
	
	public function print_file($message) // Печать в файл
	{
		$p = dirname(__FILE__);
		$PATH = $p . '/test/' . $this->name_file; // Файл будет записан по пути $PATH
		file_put_contents($PATH, $message . '     Date : ' .$this->date_time); // Запись сообщения по указанному пути
	}
	
	/////////////////////////////////////////////
	
	public function print_stdout($message) // Печать в stdout
	{
		$fp = fopen("php://stdout", 'r+');
		fputs($fp, $message . $this->date_time);
		echo stream_get_contents($fp); // Вывод на экран
	}
	
	/////////////////////////////////////////////
	
	public function print_db_sqli($message) // Вывод в базу данных через mysqli
	{
		$mysqli = mysqli_connect("$SERVER", "root", "", "bd");
		if (mysqli_connect_errno($mysqli))
		{
			echo "Не удалось подключиться к БД" . mysqli_connect_error();
		}
		$r = mysqli_query($mysqli, "CREATE DATABASE IF NOT EXISTS $this->name_db");
		if (!r)
		{
			exit(mysql_error());
		}
		mysqli_select_db($mysqli, $this->name_db);
		$s = mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS $this->name_table(id INT(11) AUTO_INCREMENT, message CHAR(200), date DATETIME, PRIMARY KEY(id))");
		if (!s)
		{
			exit(mysql_error());
		}
		mysqli_query($mysqli, 'SET NAMES UTF8');
		$insert_result = mysqli_query($mysqli, "INSERT INTO $this->name_table(id, message, date) VALUES ('0', '$message', '$this->date_time')");
	}
	
	/////////////////////////////////////////////
	
}

/////////////////////////////////// ПРОВЕРКИ

class TEMP
{
	protected $value1;
	protected $value2;
	public function __construct($val1, $val2)
	{
		$this->value1 = $val1;
		$this->value2 = $val2;
	}
}

/////////////////////////////////// Проверка вывода в файл

$a = new TEMP(12, 'DDD!');
$log1 = new Logger('log1.txt', 'bd', 'db1');
$log1->print_file($log1->get_message($a));

/////////////////////////////////// Проверка вывода в stdout

$b = new TEMP(13, 'AAA!');
$log2 = new Logger('log2.txt', 'bd', 'db2');
$log2->print_stdout($log2->get_message($b));

/////////////////////////////////// Проверка вывода в базу данных mysql с помощью mysqli

$d = new TEMP(0, '00000!');
$log4 = new Logger('log4.txt', 'bd000', 'db0');
$log4->print_db_sqli($log4->get_message($d));

///////////////////////////////////
?>