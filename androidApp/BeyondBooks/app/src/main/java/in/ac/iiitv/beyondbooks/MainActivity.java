package in.ac.iiitv.beyondbooks;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    EditText username, password;
    Button login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        Intent to_frame5 = new Intent(getApplicationContext(), wireframe7.class);
        startActivity(to_frame5);


        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);
        login = (Button) findViewById(R.id.login);

        Intent in= new Intent(this, Frame10.class);
        startActivity(in);
        login.setOnClickListener(this);

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
            case R.id.search:
                in = new Intent(this,Search.class);
                startActivity(in);
                break;
            case R.id.home:

                in = new Intent(this, MainActivity.class);
                startActivity(in);
                break;
            case R.id.user_profile:
                in = new Intent(this,wireframe8.class);
                startActivity(in);
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onClick(View v) {
        RequestServer rs = new RequestServer();

        boolean allowed = rs.authenticate(Integer.parseInt(username.getText().toString()),password.getText().toString());
        if (allowed)
        {
            Toast.makeText(this, "allow kar diya bc", Toast.LENGTH_LONG).show();
        }
        else
            Toast.makeText(this, "bhosad chod type correctly", Toast.LENGTH_LONG).show();
    }
}
