<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-lg p-8 mt-10">
  <h2 class="text-3xl font-bold mb-6 text-center text-green-700">Contact Us</h2>
  
  <form action="{{ url('send-email') }}" method="POST" class="space-y-6">
    @csrf
    
    <div>
      <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
      <input type="text" name="name" id="name" required
             class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
             placeholder="Your full name">
      @error('name')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
      <input type="email" name="email" id="email" required
             class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
             placeholder="you@example.com">
      @error('email')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="subject" class="block mb-1 font-semibold text-gray-700">Subject</label>
      <input type="text" name="subject" id="subject" required
             class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
             placeholder="Subject of your message">
      @error('subject')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="message" class="block mb-1 font-semibold text-gray-700">Message</label>
      <textarea name="message" id="message" rows="5" required
                class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                placeholder="Write your message here..."></textarea>
      @error('message')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
            class="w-full bg-green-600 text-white font-semibold py-3 rounded-xl hover:bg-green-700 transition duration-200">
      Send Message
    </button>
  </form>
</div>
