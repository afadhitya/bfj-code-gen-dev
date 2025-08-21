package com.example.bookinventoryspring.service;

import com.example.bookinventoryspring.model.Buku;
import com.example.bookinventoryspring.model.ImportHistory;
import com.example.bookinventoryspring.repository.BukuRepository;
import com.example.bookinventoryspring.repository.ImportHistoryRepository;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.time.LocalDateTime;
import java.util.List;

@Service
public class BukuService {

    @Autowired
    private BukuRepository bukuRepository;

    @Autowired
    private ImportHistoryRepository importHistoryRepository;

    public List<Buku> getBukuByDus(String namaDus) {
        return bukuRepository.findByNamaDusOrderByJudulBukuAsc(namaDus);
    }

    public List<String> getDistinctNamaDus() {
        return bukuRepository.findDistinctNamaDus();
    }

    public void deleteBukuByDus(String namaDus) {
        bukuRepository.deleteByNamaDus(namaDus);
    }

    public void importExcel(MultipartFile file) throws IOException {
        String namaDus = "";
        try (Workbook workbook = new XSSFWorkbook(file.getInputStream())) {
            Sheet sheet = workbook.getSheetAt(0);
            for (int i = 1; i <= sheet.getLastRowNum(); i++) {
                Row row = sheet.getRow(i);
                if (row == null) continue;

                Buku buku = new Buku();
                buku.setJudulBuku(row.getCell(1).getStringCellValue());
                buku.setKategori(row.getCell(2).getStringCellValue());
                buku.setPenulis(row.getCell(3).getStringCellValue());
                buku.setPenerbit(row.getCell(4).getStringCellValue());
                buku.setTahunTerbit((int) row.getCell(5).getNumericCellValue());
                buku.setJumlah((int) row.getCell(6).getNumericCellValue());
                namaDus = row.getCell(7).getStringCellValue();
                buku.setNamaDus(namaDus);

                bukuRepository.save(buku);
            }
//            saveImportHistory("Sukses", "", namaDus);
        } catch (Exception e) {
//            saveImportHistory("Gagal", e.getMessage(), namaDus);
            throw new IOException("Failed to import Excel file: " + e.getMessage(), e);
        }
    }

    private void saveImportHistory(String status, String remarks, String namaDus) {
        ImportHistory history = new ImportHistory();
        history.setTanggal(LocalDateTime.now());
        history.setStatus(status);
        history.setRemarks(remarks);
        history.setNamaDus(namaDus);
        importHistoryRepository.save(history);
    }
}
