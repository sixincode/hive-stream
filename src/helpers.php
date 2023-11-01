<?php

  function check_hasJetstream()
  {
    if(function_exists('hasJetstream')) {
        return hasJetstream();
    }else{
        return config('hive-stream.hasJetstream');
    }
  }

  function check_hasUserFeatures()
  {
    if(function_exists('hasUserFeatures')) {
        return hasUsers();
    }else{
        return config('hive-stream-features.hasUserFeatures');
    }
  }

  // TABLES
  function check_tableUsers()
  {
    if(function_exists('tableUsers')) {
        return tableUsers();
    }else{
        return config('hive-stream.table_names.users');
    }
  }

  function check_tableLogins()
  {
    if(function_exists('tableLogins')) {
        return tableLogins();
    }else{
        return config('hive-stream.table_names.logins');
    }
  }

  function check_hasRegistrationFeatures()
  {
    if(function_exists('hasRegistrationFeatures')) {
        return hasRegistrationFeatures();
    }else{
        return config('hive-stream-features.hasRegistrationFeatures');
    }
  }

  function check_hasTermsAndPrivacyPolicyFeatures()
  {
    if(function_exists('hasTermsAndPrivacyPolicyFeatures')) {
        return hasTermsAndPrivacyPolicyFeatures();
    }else{
        return config('hive-stream-features.hasTermsAndPrivacyPolicyFeatures');
    }
  }

  function check_hasApiFeatures()
  {
    if(function_exists('hasApiFeatures')) {
        return hasApiFeatures();
    }else{
        return config('hive-stream-features.hasApiFeatures');
    }
  }

  // TEAMS
  function check_hasTeamFeatures()
  {
    if(function_exists('hasTeamFeatures')) {
        return hasTeamFeatures();
    }else{
        return config('hive-stream-features.hasTeamFeatures');
    }
  }

  function check_hasTeamOwnershipOnCreateFeatures()
  {
    if(function_exists('hasTeamOwnershipOnCreateFeatures')) {
        return hasTeamOwnershipOnCreateFeatures();
    }else{
        return config('hive-stream-features.hasTeamOwnershipOnCreateFeatures');
    }
  }

  function check_hasTeamAppDefaultMembershipFeatures()
  {
    if(function_exists('hasTeamAppDefaultMembershipFeatures')) {
        return hasTeamAppDefaultMembershipFeatures();
    }else{
        return config('hive-stream-features.hasTeamAppDefaultMembershipFeatures');
    }
  }

  function check_hasSubscriptionFeatures()
  {
    if(function_exists('hasSubscriptionFeatures')) {
        return hasSubscriptionFeatures();
    }else{
        return config('hive-stream-features.hasSubscriptionFeatures');
    }
  }


  // JETSTREAM AND FORTIFY PROCESSES
         // Views
  function check_hasLoginView()
  {
    if(function_exists('hasLoginView')) {
        return hasLoginView();
    }else{
        return view('hive-stream::central.auth.login');
    }
  }

  function check_hasRegisterView()
  {
    if(function_exists('hasRegisterView')) {
        return hasRegisterView();
    }else{
        return view('hive-stream::central.auth.register');
    }
  }

  function check_hasVerifyEmailView()
  {
    if(function_exists('hasVerifyEmailView')) {
        return hasVerifyEmailView();
    }else{
        return view('hive-stream::central.auth.verify-email');
    }
  }

  function check_hasTwoFactorChallengeView()
  {
    if(function_exists('hasTwoFactorChallengeView')) {
        return hasTwoFactorChallengeView();
    }else{
        return view('hive-stream::central.auth.two-factor-challenge');
    }
  }

  function check_hasRequestPasswordResetLinkView()
  {
    if(function_exists('hasRequestPasswordResetLinkView')) {
        return hasRequestPasswordResetLinkView();
    }else{
        return view('hive-stream::central.auth.forgot-password');
    }
  }

  function check_hasResetPasswordView()
  {
    if(function_exists('hasResetPasswordView')) {
        return hasResetPasswordView();
    }else{
        return view('hive-stream::central.auth.reset-password');
    }
  }

  function check_hasConfirmPasswordView()
  {
    if(function_exists('hasConfirmPasswordView')) {
        return hasConfirmPasswordView();
    }else{
        return view('hive-stream::central.auth.confirm-password');
    }
  }


  // FORTIFY ACTIONS CLASSES
  function check_hasCreateNewUserClass()
  {
    if(function_exists('hasCreateNewUserClas')) {
        return hasCreateNewUserClas();
    }else{
        return Sixincode\HiveStream\Gear\OnBoardNewUser::class;
    }
  }

  // SUBSCRIPTIONS
  function check_hasDefaultSubscriptionPlan()
  {
    if(function_exists('hasDefaultSubscriptionPlan')) {
        return hasDefaultSubscriptionPlan();
    }else{
      return config('hive-stream-features.addSubscriptionPlanToNewUser');
    }
  }

  // SETTINGS
  function check_hasDefaultSettingModel()
  {
    if(function_exists('hasDefaultSettingsModel')) {
        return hasDefaultSettingsModel();
    }else{
      return config('hive-stream-features.addSettingsModelToNewUser');
    }
  }
