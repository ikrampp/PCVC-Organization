package com.vidiyal.servicelayer;

import retrofit.Callback;
import retrofit.http.GET;
import retrofit.http.Path;
import retrofit.http.Query;

/**
 * Created by Rifan on 11/28/2015.
 */
public interface IApiService {
 @GET("{node}")
 public void callApi(@Query("node") String node, Callback<String> callback);
}
