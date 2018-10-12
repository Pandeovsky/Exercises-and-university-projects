package com.example.panda.patryk_stopa;

import android.graphics.Canvas;
import android.graphics.Paint;
import android.graphics.Point;
import android.graphics.Rect;

/**
 * Created by Panda on 17.01.2018.
 */

public class RectPlayer implements GameObject {

    private Rect rectangle;
    private int color;

    public Rect getRectangle(){
        return rectangle;
    }

    public RectPlayer(Rect rectangle, int color){
        this.rectangle = rectangle;
        this.color  = color;
    }

    @Override
    public void draw(Canvas canvas) {
        Paint paint = new Paint();
        paint.setColor(color);
        canvas.drawRect(rectangle, paint);
    }

    @Override
    public void update() {

    }

    public void update(Point point){
        //lewa,gora,prawa,dol
        rectangle.set(point.x - rectangle.width()/2,point.y - rectangle.height()/2, point.x + rectangle.width()/2,point.y + rectangle.height()/2);
    }
}
