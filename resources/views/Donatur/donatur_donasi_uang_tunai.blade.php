import React, { useState } from 'react';

const DonationForm = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [formData, setFormData] = useState({
    program: '',
    amount: '',
    paymentMethod: '',
    verification: ''
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    setCurrentPage(2);
  };

  return (
    <div className="flex min-h-screen bg-gray-50">
      {/* Sidebar */}
      <div className="w-64 bg-white shadow-lg relative">
        <div className="p-4 flex items-center space-x-2">
          <img src="image/logo_panti.png" alt="Logo" className="w-8 h-8" />
          <span className="font-semibold">Panti Asuhan</span>
        </div>
        
        <ul className="space-y-2 px-4">
          <li className="flex items-center space-x-3 p-2 hover:bg-purple-50 rounded-lg">
            <ion-icon name="apps-outline" className="w-5 h-5" />
            <span>Beranda</span>
          </li>
          <li className="flex items-center space-x-3 p-2 bg-purple-100 text-purple-600 rounded-lg">
            <ion-icon name="wallet-outline" className="w-5 h-5" />
            <span>Donasi</span>
          </li>
          <li className="flex items-center space-x-3 p-2 hover:bg-purple-50 rounded-lg">
            <ion-icon name="newspaper-outline" className="w-5 h-5" />
            <span>Berita & Artikel</span>
          </li>
          <li className="flex items-center space-x-3 p-2 hover:bg-purple-50 rounded-lg">
            <ion-icon name="calendar-outline" className="w-5 h-5" />
            <span>Program</span>
          </li>
          <li className="flex items-center space-x-3 p-2 hover:bg-purple-50 rounded-lg">
            <ion-icon name="balloon-outline" className="w-5 h-5" />
            <span>Anak Asuh</span>
          </li>
        </ul>

        {/* Modified User Profile Section */}
        <div className="absolute bottom-4 left-0 right-0 px-4">
          <div className="flex items-center p-2 cursor-pointer hover:bg-gray-50 rounded-lg">
            <div className="flex items-center space-x-3 w-full">
              <div className="w-8 h-8 flex-shrink-0">
                <img 
                  src="image/user.png" 
                  alt="Welcome" 
                  className="w-full h-full object-cover rounded-full"
                />
              </div>
              <div className="flex-1 min-w-0">
                <p className="text-xs text-gray-500 m-0">welcome-donasi 👋</p>
                <h4 className="text-sm font-semibold text-gray-900 truncate m-0">Hafiz</h4>
              </div>
              <div className="flex-shrink-0">
                <span className="text-gray-400 text-lg">&gt;</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Main Content */}
      <div className="flex-1 px-8 py-6">
        {/* Navigation Tabs */}
        <div className="flex justify-center space-x-8 mb-8">
          <button className="text-purple-600 font-medium hover:underline">Uang</button>
          <button className="text-gray-600 font-medium hover:underline">Barang</button>
          <button className="text-gray-600 font-medium hover:underline">Jasa</button>
        </div>

        {/* Form Title */}
        <h1 className="text-2xl font-semibold text-center mb-8">
          Donasi <span className="text-purple-600">Uang Tunai</span>
        </h1>

        {/* Form Content */}
        <div className="max-w-md mx-auto">
          {currentPage === 1 ? (
            <form onSubmit={handleSubmit} className="space-y-6">
              <div className="space-y-4">
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-1">
                    Program Donasi
                  </label>
                  <select
                    className="w-full p-2 border rounded-lg focus:ring-2 focus:ring-purple-500"
                    value={formData.program}
                    onChange={(e) => setFormData({...formData, program: e.target.value})}
                    required
                  >
                    <option value="">Pilih Program Donasi</option>
                    <option value="1">Program 1</option>
                    <option value="2">Program 2</option>
                  </select>
                </div>

                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-1">
                    Jumlah Donasi
                  </label>
                  <input
                    type="number"
                    className="w-full p-2 border rounded-lg focus:ring-2 focus:ring-purple-500"
                    value={formData.amount}
                    onChange={(e) => setFormData({...formData, amount: e.target.value})}
                    required
                  />
                </div>

                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-1">
                    Metode Pembayaran
                  </label>
                  <select
                    className="w-full p-2 border rounded-lg focus:ring-2 focus:ring-purple-500"
                    value={formData.paymentMethod}
                    onChange={(e) => setFormData({...formData, paymentMethod: e.target.value})}
                    required
                  >
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                  </select>
                </div>
              </div>

              <button
                type="submit"
                className="w-full py-2 px-4 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
              >
                Lanjutkan Donasi
              </button>
            </form>
          ) : (
            <form className="space-y-6">
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-1">
                  Verifikasi Donasi
                </label>
                <input
                  type="text"
                  className="w-full p-2 border rounded-lg focus:ring-2 focus:ring-purple-500"
                  value={formData.verification}
                  onChange={(e) => setFormData({...formData, verification: e.target.value})}
                  required
                />
              </div>

              <button
                type="submit"
                className="w-full py-2 px-4 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
              >
                Kirim
              </button>
            </form>
          )}
        </div>
      </div>
    </div>
  );
};

export default DonationForm;