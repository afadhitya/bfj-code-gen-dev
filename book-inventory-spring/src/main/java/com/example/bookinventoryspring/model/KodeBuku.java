package com.example.bookinventoryspring.model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "kode_buku")
public class KodeBuku {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "kategori")
    private String kategori;

    @Column(name = "inisial_kode_buku")
    private String inisialKodeBuku;

    @Column(name = "nomor_kode_buku")
    private String nomorKodeBuku;

    // Getters and setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getKategori() {
        return kategori;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public String getInisialKodeBuku() {
        return inisialKodeBuku;
    }

    public void setInisialKodeBuku(String inisialKodeBuku) {
        this.inisialKodeBuku = inisialKodeBuku;
    }

    public String getNomorKodeBuku() {
        return nomorKodeBuku;
    }

    public void setNomorKodeBuku(String nomorKodeBuku) {
        this.nomorKodeBuku = nomorKodeBuku;
    }
}
