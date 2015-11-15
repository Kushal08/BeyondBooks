package in.ac.iiitv.beyondbooks;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.WebView;

public class AboutUs extends AppCompatActivity {

    WebView wv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about_us);

        wv = (WebView)findViewById(R.id.wv);
        wv.loadUrl("http://10.100.5.226/BeyondBooks/web/about_us.php");
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        Intent in;
        switch(id)
        {
            case R.id.option_search:
                in = new Intent(this,Frame5.class);

                startActivity(in);
                break;
            case R.id.option_home:

                in = new Intent(this, MainActivity.class);
                startActivity(in);
                break;
            case R.id.option_user_profile:
                in = new Intent(this,Wireframe8.class);
                startActivity(in);
                break;
            case R.id.option_activity_on_forum:
                in = new Intent(this,Wireframe8.class);
                startActivity(in);
                break;
            case R.id.option_book_shelf:
                in = new Intent(this,Wireframe8.class);
                startActivity(in);
                break;
            case R.id.option_forum:
                in = new Intent(this,Wireframe8.class);
                startActivity(in);
                break;
            case R.id.option_reviewed_books:
                in = new Intent(this,Wireframe8.class);
                startActivity(in);
                break;
        }

        return super.onOptionsItemSelected(item);
    }
}
