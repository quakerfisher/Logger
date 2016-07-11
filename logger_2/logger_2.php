<?php

abstract class Logger
{
	public static $PATH; // Путь до файла
	protected $name_db; // Имя базы данных
	protected $name_file; // Имя файла
	protected $name_table; // Имя таблицы бд
	protected $res; // Результат
	protected $date_time; // Дата и время
	
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
	
	abstract protected function printOut($message); // Общая функция печати всех наследников
	
	/////////////////////////////////////////////
}

/////////////////////////////////////////////

class FILELogger extends Logger
{	
	public function __construct($filename = 'log.txt')
	{
		$this->name_file = $filename;
	}
	
	/////////////////////////////////////////////
	
	public function printOut($message) // Печать в файл
	{
		$p = dirname(__FILE__);
		$PATH = $p . '/test_2/' . $this->name_file; // Файл будет записан по пути $PATH
		file_put_contents($PATH, $message . '     Date : ' .$this->date_time); // Запись сообщения по указанному пути
	}
	
	/////////////////////////////////////////////
	
}

/////////////////////////////////////////////

class STDOUTLogger extends Logger
{
	public function printOut($message) // Печать в stdout
	{
		$fp = fopen("php://stdout", 'r+');
		fputs($fp, $message . $this->date_time);
		echo stream_get_contents($fp); // Вывод на экран
	}
}

/////////////////////////////////////////////

class DBLogger extends Logger
{
	public function __construct($dbname = log_db, $tbname = log_tb)
	{
		$this->name_db = $dbname;
		$this->name_table = $tbname;
	}
	public function printOut($message) // Вывод в базу данных через mysqli
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

//////////////////////////////////// ПРОВЕРКИ

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
$log1 = new FILELogger('log1_FILELogger.txt');
$log1->printOut($log1->get_message($a));

/////////////////////////////////// Проверка вывода в stdout

$b = new TEMP(13, 'EEE!');
$log2 = new STDOUTLogger();
$log2->printOut($log2->get_message($b));

/////////////////////////////////// Проверка вывода в базу данных mysql с помощью mysqli

$c = new TEMP(14, 'FFF!');
$log3 = new DBLogger('bd_DBLogger', 'db2_DBLogger');
$log3->printOut($log3->get_message($c));

///////////////////////////////////
?>