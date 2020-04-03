<?php

namespace app\controllers;

use Yii;
use app\models\Random;
use app\models\RandomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RandomController implements the CRUD actions for Random model.
 */
class RandomController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * Displays a single Random model.
     * @param integer $id
     */
    public function actionView($id)
    {
        if (is_object($this->findModel($id)) && $this->findModel($id)->attributes) {
            echo json_encode($this->findModel($id)->attributes);
        } else {
            echo $this->findModel($id);
        }
    }

    /**
     * Creates a new Random model.
     */
    public function actionCreate()
    {
        $model = new Random();

        $model->setAttributes(['value' => rand()]);
        if ($model->save()) {
            echo json_encode($model->attributes);
        }
    }

    /**
     * Finds the Random model based on its primary key value.
     * @param integer $id
     */
    protected function findModel($id)
    {
        if (($model = Random::findOne($id)) !== null) {
            return $model;
        } else {
            return json_encode(['error' => 'No provided \'id\' in \'' . Random::tableName() . '\' table']);
        }
    }
}
