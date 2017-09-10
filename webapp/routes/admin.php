<?php

/*
|--------------------------------------------------------------------------
| ADMIN SITE
|--------------------------------------------------------------------------
*/


Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],

], function () {

    // Core Data
    CRUD::resource('attitudinalfactor', 'AttitudinalFactorCrudController');
    CRUD::resource('attitudinalranking', 'AttitudinalRankingCrudController');
    CRUD::resource('businessstage', 'BusinessStageCrudController');
    CRUD::resource('companyratingattribute', 'CompanyRatingAttributeCrudController');
    CRUD::resource('document', 'DocumentCrudController');
    CRUD::resource('educationlevel', 'EducationLevelCrudController');
    CRUD::resource('employmenttype', 'EmploymentTypeCrudController');
    CRUD::resource('expertisearea', 'ExpertiseAreaCrudController');
    CRUD::resource('importanceranking', 'ImportanceRankingCrudController');
    CRUD::resource('importancerankingscale', 'LocationCrudController');
    CRUD::resource('industry', 'IndustryCrudController');
    CRUD::resource('location', 'LocationCrudController');
    CRUD::resource('marketcapitalisation', 'MarketCapitalisationCrudController');
    CRUD::resource('organisationtype', 'OrganisationTypeCrudController');
    CRUD::resource('positionlevel', 'PositionLevelCrudController');
    CRUD::resource('remunerationrange', 'RemunerationRangeCrudController');
    CRUD::resource('remunerationtype', 'RemunerationTypeCrudController');
    CRUD::resource('skill', 'SkillCrudController');
    CRUD::resource('skillrating', 'SkillRatingCrudController');
    CRUD::resource('teammember', 'TeamMemberCrudController');
    CRUD::resource('offerstatus', 'OfferStatusCrudController');
    CRUD::resource('agebracket', 'AgeBracketCrudController');

    // Business Logic models
    CRUD::resource('company', 'CompanyCrudController');
    CRUD::resource('position', 'PositionCrudController');
    CRUD::resource('application', 'ApplicationCrudController');
    CRUD::resource('payment', 'PaymentCrudController');

});
