package com.example.his2;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;

import com.example.his2.Db.UserDbOpenHelper;
import com.example.his2.bean.UserBean;
import com.example.his2.util.ToastUtil;

public class RegisterActivity extends AppCompatActivity {
    private EditText username, password;
    private UserDbOpenHelper useropenhelper;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        useropenhelper = new UserDbOpenHelper(this);
    }

    public void login(View view) {
        Intent intent = new Intent(this, LoginActivity.class);
        startActivity(intent);
    }


    public void submitreg(View view) {
        String s1 = username.getText().toString();
        String s2 = password.getText().toString();
        UserBean user1 = new UserBean(s1, s2);
        long result = useropenhelper.register(user1);
        if (result != -1) {
            ToastUtil.toastShort(this, "注册成功");
        } else {
            ToastUtil.toastShort(this, "注册失败");
        }
    }
}