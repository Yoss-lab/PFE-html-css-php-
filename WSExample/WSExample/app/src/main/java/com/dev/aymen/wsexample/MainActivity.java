package com.dev.aymen.wsexample;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.util.Log;

import com.dev.aymen.wsexample.Network.bases.RemoteCallback;
import com.dev.aymen.wsexample.managers.UsersManager;
import com.dev.aymen.wsexample.models.User;

import java.util.List;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        UsersManager.getInstance(this).getAll(new RemoteCallback<List<User>>(this) {
            @Override
            public void onSuccess(List<User> response) {
                Log.d("riadh", "onSuccess: "+response);
            }

            @Override
            public void onUnauthorized() {

            }

            @Override
            public void onFailed(Throwable throwable) {
                Log.d("riadh", "onFailed: "+throwable.getMessage());

            }
        });
    }
}
