<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Admin panel';
        $auth->add($dashboard);

        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $user->ruleName = $rule->name;
        $auth->add($user);
        $moder = $auth->createRole('moder');
        $moder->description = 'Moderator';
        $moder->ruleName = $rule->name;
        $auth->add($moder);
        $auth->addChild($moder, $user);
        $auth->addChild($moder, $dashboard);
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moder);
    }
}