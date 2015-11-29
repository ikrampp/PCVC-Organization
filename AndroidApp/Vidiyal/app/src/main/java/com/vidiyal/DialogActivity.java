package com.vidiyal;

import android.app.Activity;
import android.os.Bundle;
import android.view.ViewGroup;

/**
 * Created by Rifan on 11/29/2015.
 */
public class DialogActivity extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dialog);
        getWindow().setLayout(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.MATCH_PARENT);
    }

    @Override
    protected void onResume() {
        super.onResume();
    }
}
