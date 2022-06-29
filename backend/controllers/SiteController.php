<?php

namespace backend\controllers;

use common\models\InvoiceFood;
use common\models\InvoiceTable;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => [
							'login',
							'error',
						],
						'allow'   => true,
					],
					[
						'actions' => [
							'logout',
							'index',
						],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			],
			/*            'verbs' => [
							'class' => VerbFilter::className(),
							'actions' => [
								'logout' => ['post'],
							],
						],*/
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$food  = InvoiceFood::find()->all();
		$table = InvoiceTable::find()->all();
		$data  = [];
		$days  = date('t');
		for ($i = $days; $i > 0; $i --) {
			$data['date'][]  = date('Y-m-d', strtotime($i . 'days ago'));
			$beginOfDay      = strtotime("today", strtotime($i . ' days ago'));
			$endOfDay        = strtotime("tomorrow", $beginOfDay) - 1;
			$data['food'][]  = (int) InvoiceFood::find()->joinWith('invoice')->andWhere([
				'>',
				'invoice.created_at',
				$beginOfDay,
			])->andWhere([
				'<',
				'created_at',
				$endOfDay,
			])->count();
			$data['table'][] = (int) InvoiceTable::find()->joinWith('invoice')->andWhere([
				'>',
				'invoice.created_at',
				$beginOfDay,
			])->andWhere([
				'<',
				'created_at',
				$endOfDay,
			])->count();
		}
		return $this->render('index', [
			'food'  => $food,
			'table' => $table,
			'data'  => $data,
		]);
	}

	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		$this->layout = 'blank';
		$model        = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			$model->password = '';
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout() {
		Yii::$app->user->logout();
		return $this->goHome();
	}
}
