@extends('layouts.app')

@section('content')
<script language="javascript">
    var m_strUpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var m_strLowerCase = "abcdefghijklmnopqrstuvwxyz";
	var m_strNumber = "0123456789";
	var m_strCharacters = "!@#$%^&*?_~";

	function checkPwdStrength() {
		var pwd = document.getElementById("password").value;
		len = pwd.length;
	
		var scorebar = document.getElementById('scorebar');
		var comp = "";
		
		if (len == 0) {
			scorebar.style.width = "0%"  
			comp = "Password Strength";
		}
		else {
			scr = parseInt(getPwdScore(pwd));
		
			if(scr >= 90) {
                scorebar.style.width = "100%"            
                scorebar.style.background = "#06bf06";
				comp = "Very Strong";
			}
			else if(scr >= 70) {
				scorebar.style.width = "80%"            
                scorebar.style.background = "#2bc24d";
				comp = "Strong";
			}
			else if(scr >= 50) {
				scorebar.style.width = "60%"            
                scorebar.style.background = "#34eb5e";
				comp = "Good";
			}
			else if(scr >= 30) {
				scorebar.style.width = "40%"            
                scorebar.style.background = "#ffff00";
				comp = "Weak";
			}
			else if(scr >= 0) {
				scorebar.style.width = "20%"            
                scorebar.style.background = "#de1616";
				comp = "Very Weak";
			}
		}
	
		document.getElementById('complexity').innerHTML = comp;
		return false;
	}
	
	function getPwdScore(strPassword) {
		// Reset combination count
		var nScore = 0;
	
		// Password length
		// -- Less than 4 characters
		if (strPassword.length < 5) {
			nScore += 5;
		}
		// -- 5 to 7 characters
		else if (strPassword.length > 4 && strPassword.length < 8) {
			nScore += 10;
		}
		// -- 8 or more
		else if (strPassword.length > 7) {
			nScore += 25;
		}
	
		// Letters
		var nUpperCount = countContain(strPassword, m_strUpperCase);
		var nLowerCount = countContain(strPassword, m_strLowerCase);
		var nLowerUpperCount = nUpperCount + nLowerCount;
		// -- Letters are all lower case
		if (nUpperCount == 0 && nLowerCount != 0) {
			nScore += 10;
		}
		// -- Letters are upper case and lower case
		else if (nUpperCount != 0 && nLowerCount != 0) {
			nScore += 20;
		}
	
		// Numbers
		var nNumberCount = countContain(strPassword, m_strNumber);
		// -- 1 number
		if (nNumberCount == 1) {
			nScore += 10;
		}
		// -- 3 or more numbers
		if (nNumberCount >= 3) {
			nScore += 20;
		}
	
		// Characters
		var nCharacterCount = countContain(strPassword, m_strCharacters);
		// -- 1 character
		if (nCharacterCount == 1) {
			nScore += 10;
		}
		// -- More than 1 character
		if (nCharacterCount > 1) {
			nScore += 25;
		}
	
		// Bonus
		// -- Letters and numbers
		if (nNumberCount != 0 && nLowerUpperCount != 0) {
			nScore += 2;
		}
		// -- Letters, numbers, and characters
		if (nNumberCount != 0 && nLowerUpperCount != 0 && nCharacterCount != 0) {
			nScore += 3;
		}
		// -- Mixed case letters, numbers, and characters
		if (nNumberCount != 0 && nUpperCount != 0 && nLowerCount != 0
				&& nCharacterCount != 0) {
			nScore += 5;
		}       
	
		return nScore;
	}
	
	// Checks a string for a list of characters
	function countContain(strPassword, strCheck) {
		// Declare variables
		var nCount = 0;
	
		for (i = 0; i < strPassword.length; i++) {
			if (strCheck.indexOf(strPassword.charAt(i)) > -1) {
				nCount++;
			}
		}
	
		return nCount;
	}

  </script>
  <style type="text/css">
	#pmId {
        margin-top: 5px;
	}

	#scorebarBorder {
		height: 10px;
		position: relative;
		width: 100%;
	}
	
	#scorebar {
		height: 10px;
		width: 0%;
		z-index: 0;
	}

	
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  onkeyup="return checkPwdStrength();">
                                <div id="pmId" class="row">
                                    <div class="col-8">
                                        <div id="scorebarBorder">
                                            <div id="scorebar" ></div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-right"><span id="complexity"></span></div>
                                    
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
