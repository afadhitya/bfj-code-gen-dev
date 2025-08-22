package com.example.bookinventoryspring.dto;

public class GeneratedCode {
    private String kategori;
    private String kode;
    private String judulBuku;
    private String penulis;

    public GeneratedCode(String kategori, String kode, String judulBuku, String penulis) {
        this.kategori = kategori;
        this.kode = kode;
        this.judulBuku = judulBuku;
        this.penulis = penulis;
    }

    // Getters and setters
    public String getKategori() {
        return kategori;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public String getKode() {
        return kode;
    }

    public void setKode(String kode) {
        this.kode = kode;
    }

    public String getJudulBuku() {
        return judulBuku;
    }

    public void setJudulBuku(String judulBuku) {
        this.judulBuku = judulBuku;
    }

    public String getPenulis() {
        return penulis;
    }

    public void setPenulis(String penulis) {
        this.penulis = penulis;
    }
}
