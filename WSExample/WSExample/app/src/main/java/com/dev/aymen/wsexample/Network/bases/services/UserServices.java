package com.dev.aymen.wsexample.Network.bases.services;

import com.dev.aymen.wsexample.models.User;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface UserServices {

    @GET("user/getAll")
    Call<List<User>> getAll();

    @POST("user/insert")
    Call<Boolean> insert(@Body User user);

    @POST("user/update")
    Call<Boolean> update(@Body User user);

    @POST("user/delete")
    Call<Boolean> delete(@Body User user);


}
