package com.example.bookinventoryspring.service;

import com.example.bookinventoryspring.dto.GeneratedCode;
import com.example.bookinventoryspring.dto.CodeGenerationResult;
import com.example.bookinventoryspring.model.Buku;
import com.example.bookinventoryspring.model.KodeBuku;
import com.example.bookinventoryspring.repository.BukuRepository;
import com.example.bookinventoryspring.repository.KodeBukuRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class CodeGenerationService {

    @Autowired
    private BukuRepository bukuRepository;

    @Autowired
    private KodeBukuRepository kodeBukuRepository;

    public CodeGenerationResult generateCodes(String dusParam) {
        List<GeneratedCode> generatedCodes = new ArrayList<>();
        List<String> errors = new ArrayList<>();
        List<KodeBuku> kodeBukuList = kodeBukuRepository.findAll();
        List<Buku> bukuList = bukuRepository.findByNamaDusOrderByJudulBukuAsc(dusParam);

        for (Buku buku : bukuList) {
            boolean categoryFound = false;
            for (int i = 0; i < buku.getJumlah(); i++) {
                KodeBuku matchedKodeBuku = findKodeBuku(kodeBukuList, buku.getKategori());
                if (matchedKodeBuku != null) {
                    categoryFound = true;
                    String judulBukuInitial = buku.getJudulBuku().substring(0, 1).toUpperCase();
                    String penulisInitials = buku.getPenulis().length() >= 3 ? buku.getPenulis().substring(0, 3).toUpperCase() : buku.getPenulis().toUpperCase();

                    generatedCodes.add(new GeneratedCode(
                        matchedKodeBuku.getInisialKodeBuku(),
                        matchedKodeBuku.getNomorKodeBuku(),
                        judulBukuInitial,
                        penulisInitials
                    ));
                }
            }
            if (!categoryFound) {
                errors.add("Kategori '" + buku.getKategori() + "' for book '" + buku.getJudulBuku() + "' not found.");
            }
        }
        return new CodeGenerationResult(generatedCodes, errors);
    }

    private KodeBuku findKodeBuku(List<KodeBuku> kodeBukuList, String kategori) {
        for (KodeBuku kodeBuku : kodeBukuList) {
            if (kodeBuku.getKategori().trim().equalsIgnoreCase(kategori.trim())) {
                return kodeBuku;
            }
        }
        return null;
    }
}
