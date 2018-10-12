package com.example.panda.patryk_stopa;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class splashScreen extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);
        Thread splash = new Thread(){
            @Override
            public void run(){
                try {
                    sleep(3000);
                    Intent Splash = new Intent(getApplicationContext(),MainActivity.class);
                    startActivity(Splash);
                    finish();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

        };
        splash.start();

    }

}
