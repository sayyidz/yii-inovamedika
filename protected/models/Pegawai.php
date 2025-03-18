<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id
 * @property integer $user_id
 * @property string $nama_pegawai
 * @property string $gender
 * @property string $tahun_masuk
 * @property string $tanggal_lahir
 * @property string $pendidikan
 * @property integer $jumlah_tindakan
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Wilayah[] $wilayahs
 */
class Pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, nama_pegawai, gender, tahun_masuk, tanggal_lahir, pendidikan, jumlah_tindakan', 'required'),
			array('user_id, jumlah_tindakan', 'numerical', 'integerOnly'=>true),
			array('nama_pegawai, pendidikan', 'length', 'max'=>255),
			array('gender', 'length', 'max'=>9),
			array('harga', 'numerical', 'integerOnly' => false, 'min' => 0),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, nama_pegawai, gender, tahun_masuk, tanggal_lahir, pendidikan, jumlah_tindakan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'wilayahs' => array(self::HAS_MANY, 'Wilayah', 'pegawai_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'nama_pegawai' => 'Nama Pegawai',
			'gender' => 'Gender',
			'tahun_masuk' => 'Tahun Masuk',
			'tanggal_lahir' => 'Tanggal Lahir',
			'pendidikan' => 'Pendidikan',
			'jumlah_tindakan' => 'Jumlah Tindakan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('tahun_masuk',$this->tahun_masuk,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('pendidikan',$this->pendidikan,true);
		$criteria->compare('jumlah_tindakan',$this->jumlah_tindakan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
