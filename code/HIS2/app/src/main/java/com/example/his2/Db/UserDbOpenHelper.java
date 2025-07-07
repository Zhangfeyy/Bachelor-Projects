package com.example.his2.Db;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import com.example.his2.bean.UserBean;

public class UserDbOpenHelper extends SQLiteOpenHelper {
    private static final String DB_NAME = "Mysqlite.db";
    private static final String create_users = "create table users(name varchar(32),password varchar(32))";


    public UserDbOpenHelper(@Nullable Context context) {
        super(context, DB_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(create_users);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }

    public long register(UserBean u){
        SQLiteDatabase db = getWritableDatabase();
        ContentValues cv = new ContentValues();
        cv.put("name",u.getUsername());
        cv.put("password",u.getPassword());
        long users = db.insert("users",null,cv);
        return users;
    }

    public boolean login(String name,String password){
        SQLiteDatabase db1 = getWritableDatabase();
        boolean result = false;
        Cursor users = db1.query("users",null,"name like ?",new String[]{name},null,null,null);
        if(users!=null){
            while(users.moveToNext()){
                String password1  = users.getString(1);
                result = password1.equals(password);
            }
        }
        return result;
    }


}
