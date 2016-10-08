<?php

namespace app\controllers;

use Yii;
use app\models\Slick;
use app\models\SlickSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlickController implements the CRUD actions for Slick model.
 */
class SlickController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Slick models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlickSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slick model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slick model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slick();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->upload_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * Updates an existing Slick model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->upload_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slick model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slick model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slick the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slick::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
        private function Uploads($isAjax = false) {
        if (Yii::$app->request->isPost) {
            $images = UploadedFile::getInstancesByName('upload_ajax');
            if ($images) {

                if ($isAjax === true) {
                    $ref = Yii::$app->request->post('ref');
                } else {
                    $Freelance = Yii::$app->request->post('Freelance');
                    $ref = $Freelance['ref'];
                }

                $this->CreateDir($ref);

                foreach ($images as $file) {
                    $fileName = $file->baseName . '.' . $file->extension;
                    $realFileName = md5($file->baseName . time()) . '.' . $file->extension;
                    $savePath = Freelance::UPLOAD_FOLDER . '/' . $ref . '/' . $realFileName;
                    if ($file->saveAs($savePath)) {

                        if ($this->isImage(Url::base(true) . '/' . $savePath)) {
                            $this->createThumbnail($ref, $realFileName);
                        }

                        $model = new Uploads;
                        $model->ref = $ref;
                        $model->file_name = $fileName;
                        $model->real_filename = $realFileName;
                        $model->save();

                        if ($isAjax === true) {
                            echo json_encode(['success' => 'true']);
                        }
                    } else {
                        if ($isAjax === true) {
                            echo json_encode(['success' => 'false', 'eror' => $file->error]);
                        }
                    }
                }
            }
        }
    }

}
