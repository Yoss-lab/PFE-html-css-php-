package com.dev.aymen.wsexample.managers;

import android.content.Context;

import com.dev.aymen.wsexample.Network.bases.RemoteCallback;
import com.dev.aymen.wsexample.Network.bases.ServiceFactory;
import com.dev.aymen.wsexample.Network.bases.services.UserServices;
import com.dev.aymen.wsexample.models.User;

import java.util.List;


public class UsersManager {

    String baseUrl;
    private static UsersManager instance;
    private UserServices userServices;
    User user;
    Context context;

    public UsersManager(Context context) {
        this.context = context;
        baseUrl = "http://192.168.43.152:8000";
        userServices = new ServiceFactory<>(UserServices.class, baseUrl).makeService();
    }

    public static UsersManager getInstance(Context context) {
        if (instance == null)
            instance = new UsersManager(context);
        return instance;
    }

    public void insert(User user, RemoteCallback<Boolean> users) {
        userServices.insert(user).enqueue(users);
    }

    public void update(User user, RemoteCallback<Boolean> users) {
        userServices.update(user).enqueue(users);
    }

    public void delete(User user, RemoteCallback<Boolean> users) {
        userServices.delete(user).enqueue(users);
    }

    public void getAll(RemoteCallback<List<User>> users) {
        userServices.getAll().enqueue(users);
    }
}
