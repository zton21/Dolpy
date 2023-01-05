package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import com.example.myapplication.R

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
// inisial id dar layout
        val btnLogin = findViewById<Button>(R.id.btnLogin)
        val edEmail = findViewById<EditText>(R.id.edEmail)

        btnLogin.setOnClickListener {

            // membuat variabel yang menampung nilai input string
            val namaEmail = edEmail.text.toString()

            Intent(this, LoginAct2::class.java).also{
                //membuat nick name unic sebagai ID
                it.putExtra("EXTRA_NAMA_EMAIL", namaEmail)
                startActivity(it)
            }
        }
    }

}