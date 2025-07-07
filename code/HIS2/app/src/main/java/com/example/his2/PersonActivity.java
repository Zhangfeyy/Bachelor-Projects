package com.example.his2;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.TextView;

public class PersonActivity extends AppCompatActivity {
    TextView username,password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_person);
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        username.setText(PreferenceManager.getDefaultSharedPreferences(this).getString("USERNAME", ""));
        password.setText(PreferenceManager.getDefaultSharedPreferences(this).getString("PASSWORD", ""));
    }

    public void openHome(View view) {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
    }

    public void openNote(View view) {
        Intent intent = new Intent(this, NoteActivity.class);
        startActivity(intent);
    }
}