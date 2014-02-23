<?php
namespace \Vendor\Namespace\ClassName;

/**
  *@Entity @Table(name="CSVWriter")
  **/

class CSVWriter
{


	protected static $instance = null;

	/**
	  *@var int
	  *@Id @Column(type="integer") @GeneratedValue 
	  */	
	protected $id;

	/**
	  *@var int
	  *@Column(type="integer")
	  */	
	protected $HITS;

	/**
	  *@var int
	  *@Column(type="integer")
	  */	
	protected $HITS1;

	/**
	  *@var int
	  *@Column(type="integer")
	  */	
	protected $TotalHits;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $uri;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log1;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log2;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log3;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log4;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log5;

	/**
	  *@var string
	  *@Column(type="string")
	  */	
	protected $Log6;

	/*
	 *Singleton contructor is made private so that only one instance can be used for this class.
	 */
	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(static::$instance)){
			static::$instance = new static;
		}
		return static::$instance;
	}


	public function getId()
	{
		return $this->id;
	}


	public function setHits1($hits)
	{
		$this->HITS = $hits;
		return $this;
		//return static::$instance;
	}

	public function setHits2($hits)
	{
		$this->HITS1 = $hits;
		return $this;
		//return static::$instance;
	}

	public function setTotalHits($hits)
	{
		$this->TotalHits = $hits;
		return $this;
		//return static::$instance;
	}

	public function setUri($uri)
	{
		$this->uri = $uri;
		return $this;
		//return static::$instance;
	}	

	public function setLogFiles($logFile1, $logFile2, $logFile3, $logFile4, $logFile5, $logFile6)
	{
		$this->Log1	= $logFile1;
		$this->Log2	= $logFile2;
		$this->Log3	= $logFile3;
		$this->Log4	= $logFile4;
		$this->Log5	= $logFile5;
		$this->Log6	= $logFile6;
		return $this;
		//return static::$instance;
	}
}
