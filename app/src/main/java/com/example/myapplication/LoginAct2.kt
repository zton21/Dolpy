package com.getsucode.logintemplate

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import com.example.myapplication.R

class LoginAct2 : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.test)

        // inisial id dari layout
        val tvInputanEmail = findViewById<TextView>(R.id.tvInputanEmail)

        // mengambil inputan data
        val namaUserEmail = intent.getStringExtra("EXTRA_NAMA_EMAIL")

        // menset data
        val hailNamaEmail = "Selamat ${namaUserEmail}\n" + "kamu sudah berhasil login"
        tvInputanEmail.text = hailNamaEmail
    }
}