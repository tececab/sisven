<?php

/**
 * This is the model class for table "tb_tipo_cliente".
 *
 * The followings are the available columns in table 'tb_tipo_cliente':
 * @property integer $ID_TCLI
 * @property integer $ID_EST
 * @property string $NOMBRE_TCLI
 *
 * The followings are the available model relations:
 * @property TbCliente[] $tbClientes
 * @property TbEstado $iDEST
 */
class TipoClienteModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_tipo_cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_EST', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_TCLI', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_TCLI, ID_EST, NOMBRE_TCLI', 'safe', 'on'=>'search'),
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
			'tbClientes' => array(self::HAS_MANY, 'TbCliente', 'ID_TCLI'),
			'iDEST' => array(self::BELONGS_TO, 'TbEstado', 'ID_EST'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TCLI' => 'Id Tcli',
			'ID_EST' => 'Id Est',
			'NOMBRE_TCLI' => 'Nombre Tcli',
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

		$criteria->compare('ID_TCLI',$this->ID_TCLI);
		$criteria->compare('ID_EST',$this->ID_EST);
		$criteria->compare('NOMBRE_TCLI',$this->NOMBRE_TCLI,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoClienteModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
