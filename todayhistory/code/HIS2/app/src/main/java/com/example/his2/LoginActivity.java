package com.example.his2;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;

import com.example.his2.Db.UserDbOpenHelper;
import com.example.his2.util.ToastUtil;

public class LoginActivity extends AppCompatActivity {
    private EditText username, password;
    private UserDbOpenHelper useropenhelper;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        useropenhelper = new UserDbOpenHelper(this);
    }

    public void register(View view) {

        Intent intent = new Intent(this, RegisterActivity.class);
        startActivity(intent);

    }


    public void submitlog(View view) {
        String s1 = username.getText().toString();
        String s2 = password.getText().toString();
        boolean result  = useropenhelper.login(s1,s2);
        if(result){
            ToastUtil.toastShort(this, "登录成功");
            SharedPreferences.Editor editor = PreferenceManager.getDefaultSharedPreferences(this).edit();
            editor.putString("USERNAME", s1);
            editor.apply();
            editor.putString("PASSWORD", s2);
            editor.apply();
            Intent intent = new Intent(this,MainActivity.class);
            startActivity(intent);
        }else{
            ToastUtil.toastShort(this, "登录失败");
        }
    }
}