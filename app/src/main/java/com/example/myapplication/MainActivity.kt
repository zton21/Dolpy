package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
//import android.view.Menu
//import android.view.MenuItem
//import android.widget.Toast

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
    }

//    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
//        menuInflater.inflate(R.menu.toolbar_menu, menu)
//        return true
//    }
//
//    override fun onOptionsItemSelected(item:): Boolean {
//        when(item.itemId){
//            R.id.leftIcon-> Toast.makeText(this, "Ini Menu Samping", Toast.LENGTH_LONG).show()
//            R.id.rightIcon-> Toast.makeText(this, "Ini Profile", Toast.LENGTH_LONG).show()
//        }
//        return true
//    }
}