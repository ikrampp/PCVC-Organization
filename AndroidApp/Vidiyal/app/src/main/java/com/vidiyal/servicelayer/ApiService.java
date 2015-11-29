package com.vidiyal.servicelayer;

import android.util.Log;

import com.vidiyal.Util;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import retrofit.Callback;
import retrofit.Retrofit;

/**
 * Created by Rifan on 11/28/2015.
 */
public class ApiService {
public  void callApiService(String node, Callback<String> stringCallback){
    Retrofit builder=new Retrofit.Builder().baseUrl(Util.BASEURL).build();
    IApiService iApiService=builder.create(IApiService.class);
    iApiService.callApi(node,stringCallback);
}

    public String getResponse(String urlString){
        String response="";
        try {
            URL url = new URL(urlString);
            HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
            InputStream inputStream = urlConnection.getInputStream();
            if (null != inputStream)
                response = convertToString(inputStream);
            Log.e("Response", "Response" + response);
        } catch (Exception e) {
            System.out.println(e.getMessage());
            return e.getMessage();
        }
        return  response;
    }

    public String convertToString(InputStream is){
        BufferedReader r = new BufferedReader(new InputStreamReader(is));
        StringBuilder total = new StringBuilder();
        String line=null;
        try {
            while ((line = r.readLine()) != null) {
                total.append(line);
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return total.toString();
    }

}
