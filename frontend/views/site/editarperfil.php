<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Editar Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Faça as alterações que pretende e guarde as alterações:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <p>Nome:</p>
            <?= $form->field($model, 'nome')->hint(Yii::$app->user->identity->username) ?>

            <p>Email:</p>
            <?= $form->field($model, 'email')->hint(Yii::$app->user->identity->email) ?>

            <p>Data de Nascimento:</p>
            <?= $form->field($model, 'dataNascimento')->hint(Yii::$app->user->identity->dataNascimento) ?>

            <p>Nacionalidade:</p>
            <?php $countries = array(
                'Afghanistan' => 'Afghanistan',
                'Albania' => 'Albania',
                'Algeria' => 'Algeria',
                'Armenia' => 'Armenia',
                'Australia' => 'Australia',
                'Austria' => 'Austria',
                'Azerbaijan' => 'Azerbaijan',
                'Bahrain' => 'Bahrain',
                'Bangladesh' => 'Bangladesh',
                'Belarus' => 'Belarus',
                'Belgium' => 'Belgium',
                'Bhutan' => 'Bhutan',
                'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
                'Botswana' => 'Botswana',
                'Brunei' => 'Brunei',
                'Bulgaria' => 'Bulgaria',
                'Burkina Faso' => 'Burkina Faso',
                'Burma' => 'Burma',
                'Burundi' => 'Burundi',
                'Cambodia' => 'Cambodia',
                'Canada' => 'Canada',
                'Central African Republic' => 'Central African Republic',
                'Chad' => 'Chad',
                'China' => 'China',
                'Congo, Democratic Republic of the' => 'Congo, Democratic Republic of the',
                'Congo, Republic of the' => 'Congo, Republic of the',
                'Croatia' => 'Croatia',
                'Cyprus' => 'Cyprus',
                'Czech Republic' => 'Czech Republic',
                'Denmark' => 'Denmark',
                'Djibouti' => 'Djibouti',
                'Dominica' => 'Dominica',
                'Dominican Republic' => 'Dominican Republic',
                'Egypt' => 'Egypt',
                'Estonia' => 'Estonia',
                'Ethiopia' => 'Ethiopia',
                'Finland' => 'Finland',
                'France' => 'France',
                'French Guiana' => 'French Guiana',
                'Gambia, The' => 'Gambia, The',
                'Georgia' => 'Georgia',
                'Germany' => 'Germany',
                'Ghana' => 'Ghana',
                'Greece' => 'Greece',
                'Greenland' => 'Greenland',
                'Guam' => 'Guam',
                'Guatemala' => 'Guatemala',
                'Guinea' => 'Guinea',
                'Guinea-Bissau' => 'Guinea-Bissau',
                'Guyana' => 'Guyana',
                'Hong Kong' => 'Hong Kong',
                'Hungary' => 'Hungary',
                'Iceland' => 'Iceland',
                'India' => 'India',
                'Indonesia' => 'Indonesia',
                'Iran' => 'Iran',
                'Iraq' => 'Iraq',
                'Ireland' => 'Ireland',
                'Italy' => 'Italy',
                'Jamaica' => 'Jamaica',
                'Japan' => 'Japan',
                'Jersey' => 'Jersey',
                'Jordan' => 'Jordan',
                'Kazakhstan' => 'Kazakhstan',
                'Kenya' => 'Kenya',
                'Korea North' => 'Korea North',
                'Korea South' => 'Korea South',
                'Kuwait' => 'Kuwait',
                'Kyrgyzstan' => 'Kyrgyzstan',
                'Laos' => 'Laos',
                'Latvia' => 'Latvia',
                'Lebanon' => 'Lebanon',
                'Lesotho' => 'Lesotho',
                'Liberia' => 'Liberia',
                'Libya' => 'Libya',
                'Lithuania' => 'Lithuania',
                'Luxembourg' => 'Luxembourg',
                'Madagascar' => 'Madagascar',
                'Malawi' => 'Malawi',
                'Malaysia' => 'Malaysia',
                'Maldives' => 'Maldives',
                'Mali' => 'Mali',
                'Malta' => 'Malta',
                'Mauritania' => 'Mauritania',
                'Mauritius' => 'Mauritius',
                'Mexico' => 'Mexico',
                'Morocco' => 'Morocco',
                'Mozambique' => 'Mozambique',
                'Namibia' => 'Namibia',
                'Nepal' => 'Nepal',
                'Netherlands' => 'Netherlands',
                'New Zealand' => 'New Zealand',
                'Nicaragua' => 'Nicaragua',
                'Niger' => 'Niger',
                'Nigeria' => 'Nigeria',
                'Norway' => 'Norway',
                'Oman' => 'Oman',
                'Pakistan' => 'Pakistan',
                'Panama' => 'Panama',
                'PapuaNew Guinea' => 'PapuaNew Guinea',
                'Paraguay' => 'Paraguay',
                'Peru' => 'Peru',
                'Philippines' => 'Philippines',
                'Poland' => 'Poland',
                'Portugal' => 'Portugal',
                'Qatar' => 'Qatar',
                'Romania' => 'Romania',
                'Russia' => 'Russia',
                'Rwanda' => 'Rwanda',
                'Saudi Arabia' => 'Saudi Arabia',
                'Senegal' => 'Senegal',
                'Serbiaand Montenegro' => 'Serbiaand Montenegro',
                'Seychelles' => 'Seychelles',
                'SierraLeone' => 'SierraLeone',
                'Singapore' => 'Singapore',
                'Slovakia' => 'Slovakia',
                'Slovenia' => 'Slovenia',
                'Somalia' => 'Somalia',
                'South Africa' => 'South Africa',
                'Spain' => 'Spain',
                'SriLanka' => 'SriLanka',
                'Sudan' => 'Sudan',
                'Swaziland' => 'Swaziland',
                'Sweden' => 'Sweden',
                'Switzerland' => 'Switzerland',
                'Syria' => 'Syria',
                'Taiwan' => 'Taiwan',
                'Tajikistan' => 'Tajikistan',
                'Tanzania' => 'Tanzania',
                'Thailand' => 'Thailand',
                'Trinidadand Tobago' => 'Trinidadand Tobago',
                'Tunisia' => 'Tunisia',
                'Turkey' => 'Turkey',
                'Turkmenistan' => 'Turkmenistan',
                'Uganda' => 'Uganda',
                'Ukraine' => 'Ukraine',
                'United Arab Emirates' => 'United Arab Emirates',
                'United Kingdom' => 'United Kingdom',
                'United States' => 'United States',
                'Uruguay' => 'Uruguay',
                'Uzbekistan' => 'Uzbekistan',
                'Vietnam' => 'Vietnam',
                'VirginIslands' => 'VirginIslands',
                'Yemen' => 'Yemen',
                'Zambia' => 'Zambia',
                'Zimbabwe' => 'Zimbabwe',
            ); ?>

            <?= $form->field($model, 'nacionalidade')->dropDownList($countries,['prompt'=>'Select']); ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'confirmacaoPassword')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <p>Username:</p>
    <p><?= Yii::$app->user->identity->username ?></p>
    <p>Nome:</p>
    <p><?= Yii::$app->user->identity->nome ?></p>

    <p><?= Yii::$app->user->identity->email ?></p>
    <p>Data de Nascimento:</p>
    <p><?= Yii::$app->user->identity->dataNascimento ?></p>
    <p>Nacionalidade:</p>
    <p><?= Yii::$app->user->identity->nacionalidade ?></p>
    <p>Golos Marcados:</p>
    <p><?= Yii::$app->user->identity->golosMarcados ?></p>
    <p>Jogos Jogados:</p>
    <p><?= Yii::$app->user->identity->jogosJogados ?></p>

    <p><a class="btn btn-default" href="">Cancelar</a><a class="btn btn-default" href="">Guardar Alterações</a></p>

</div>