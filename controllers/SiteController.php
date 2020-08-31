<?php

namespace app\controllers;

use app\models\Queue;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $mainCounter=Queue::find()->select('category.id, category.name, count(queue.id) as count')->leftJoin('category','queue.category_id=category.id')->andWhere(['queue.is_valid'=>null])->groupBy(['category.id'])->asArray()->all();
            return $this->render('home',['mainCounter' => $mainCounter]);
        }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user=User::findOne(Yii::$app->user->getId());
            $user->last_visit=0;
            $user->save();
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionStartValidation($type)
    {
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        $mainModel = Queue::validationQueue($type);
        if ($mainModel['request'] === 'view') {
            return $this->render('validation',['modelQuest'=>$mainModel['modelQuest'], 'model'=>$mainModel['model'], 'modelInput'=>$mainModel['modelInput']]);
        }else if ($mainModel['request'] === true) {
            return $this->redirect('/site/start-validation?type='.$type);
        } else {
            return $this->redirect('index');
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $user=User::findOne(Yii::$app->user->getId());
        $user->last_visit=time();
        $user->save();
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionProfile($id=null)
    {
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        if (!$id){
            $id=Yii::$app->user->getId();
        }
        $model = User::findOne($id);

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionStatistic()
    {
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        $queue=Queue::find()->select('category.id, category.name, count(queue.id) as count')->leftJoin('category','queue.category_id=category.id')->where(['is_valid'=>1])->groupBy(['category.id'])->asArray()->all();
        $users=User::find();
        $provider = new ActiveDataProvider([
            'query' => $users,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('statistic',['provider'=>$provider,'queue'=>$queue]);
    }
    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
